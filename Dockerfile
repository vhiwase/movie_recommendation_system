# base image
FROM ubuntu:20.04

# Update and install python, pip
RUN apt-get update -y
RUN apt-get install -y python3-pip python3-dev build-essential curl
CMD /bin/bash

# LABEL about the custom image
LABEL maintainer="hiwase.vaibhav@gmail.com"
LABEL version="0.1"
LABEL description="This is custom Docker Image."

# set working directory
RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

# add requirements (to leverage Docker cache)
ADD ./requirements.txt /usr/src/app/requirements.txt

# install requirements
RUN pip3 install pip --upgrade
RUN pip3 install -r requirements.txt

# copy project
COPY . /usr/src/app