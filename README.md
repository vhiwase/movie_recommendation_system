Movie Recommendation System
===

Movie Recommendation System with docker file

Installation
---

Install Docker on your workstation (see [instruction](https://www.docker.com/products/docker-desktop)) Note: There is a known issue with docker-compose 1.29.2 or latest version.

**Running application in background**

After Docker is installed, you can immediately get started locally with an this application. Start docker to run and use the application. Stop docker to remove all of the containers, networks, images, and volumes.

- **Start Docker:** To create and start the container in the background `docker-compose up -d -V`

- **Stop Docker:** To stop and remove containers, networks, images, and volumes `docker-compose down -v`

Once you start the application, the UI is ready to go at [http://localhost:5004](http://localhost:5004) for registration and then application will be hosted on [http://localhost:5000](http://localhost:5000) which you can navigate after successful login from Demo button.

---

Revision 1: Vaibhav Hiwase (hiwase.vaibhav@gmail.com), 11.05.2021
