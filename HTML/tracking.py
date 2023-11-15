from http.server import BaseHTTPRequestHandler, HTTPServer
import sqlite3
import json
import urllib

class RequestHandler(BaseHTTPRequestHandler):
    def _set_headers(self, content_type='text/html'):
        self.send_response(200)
        self.send_header('Content-type', content_type)
        self.end_headers()

    def do_GET(self):
        if self.path == '/':
            self._set_headers()
            with open('path_to_your_html_file.html', 'rb') as file:
                self.wfile.write(file.read())
        elif self.path.startswith('/track?'):
            self._set_headers('application/json')
            tracking_number = urllib.parse.parse_qs(urllib.parse.urlparse(self.path).query).get('tracking_number', [None])[0]
            response = self.track_package(tracking_number)
            self.wfile.write(json.dumps(response).encode())

    def track_package(self, tracking_number):
        if tracking_number:
            # Connect to your database and fetch tracking status
            conn = sqlite3.connect('your_database.db')
            cursor = conn.cursor()
            cursor.execute("SELECT status FROM tracking WHERE tracking_number = ?", (tracking_number,))
            status = cursor.fetchone()
            conn.close()
            if status:
                return {'status': status[0]}
            else:
                return {'status': 'not_found'}
        return {'status': 'invalid'}

def run(server_class=HTTPServer, handler_class=RequestHandler, port=8000):
    server_address = ('', port)
    httpd = server_class(server_address, handler_class)
    print(f'Starting http server on port {port}')
    httpd.serve_forever()

if __name__ == '__main__':
    run()
