Movie Recommendation System
===

Movie Recommendation System with docker file

Installation
---

In order to make things working you have to create a public ip of your system in `movie_recommendation_system/project/www/html/webdictionary.txt`
Go to `movie_recommendation_system` folder and run the following command:
```
python3 -m pip install virtualenv
virtualenv .venv
source .venv/bin/actiavte
python3 -m pip install requirements.txt
python3 public_ip.py --localhost True # If you are not in cloud machine
python3 public_ip.py # And press enter to generate public ip of cloud machine
```
Install Docker on your workstation (see [instruction](https://www.docker.com/products/docker-desktop)) Note: There is a known issue with docker-compose 1.29.2 or latest version.

**Running application in background**

After Docker is installed, you can immediately get started locally with an this application. Start docker to run and use the application. Stop docker to remove all of the containers, networks, images, and volumes.

- **Start Docker:** To create and start the container in the background `docker-compose up -d -V`

- **Stop Docker:** To stop and remove containers, networks, images, and volumes `docker-compose down -v`

Once you start the application, the UI is ready to go at [http://localhost](http://localhost) for registration and then application will be hosted on [http://localhost:5004/](http://localhost:5004/) which you can navigate from Demo button after successful login.

NGINX Reverse Proxy Setting
---
Run the below commands to install Nginx:
```
sudo apt update
sudo apt install nginx
sudo ufw enable
sudo ufw app list
sudo ufw allow 'Nginx Full'
sudo ufw allow 'Nginx HTTP'
sudo ufw allow 'Nginx HTTPS'
sudo ufw allow 'OpenSSH'
```
Go to `cd /etc/nginx/sites-available` and create a file using `sudo nano movie`. Copy Paste the following line. Then type ctrl+X + Y to save changes.

```
server {
  listen 80 default_server;
  listen [::]:80 default_server;
  root /usr/share/nginx/html;
  index index.html index.html;

  location /home {
    proxy_pass          http://127.0.0.1:5004;
    proxy_http_version  1.1;
    proxy_redirect      default;
    proxy_set_header    Upgrade $http_upgrade;
    proxy_set_header    Connection "upgrade";
    proxy_set_header    Host $host;
    proxy_set_header    X-Real-IP $remote_addr;
    proxy_set_header    X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header    X-Forwarded-Host $server_name;
  }

  location / {
    proxy_pass          http://127.0.0.1:8080;
    proxy_http_version  1.1;
    proxy_redirect      default;
    proxy_set_header    Upgrade $http_upgrade;
    proxy_set_header    Connection "upgrade";
    proxy_set_header    Host $host;
    proxy_set_header    X-Real-IP $remote_addr;
    proxy_set_header    X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header    X-Forwarded-Host $server_name;
  }
}
```
make sure to delete the `default_server` in default file for port 80 in the same folder. 

Also make sure to run the following commands:
```
sudo ln -s /etc/nginx/sites-available/movie /etc/nginx/sites-enabled/movie
sudo nginx -t
sudo systemctl restart nginx
```
If something fails then revise the process again. Or you can create an issue.

---

Revision 1: Vaibhav Hiwase (hiwase.vaibhav@gmail.com), 11.05.2021
