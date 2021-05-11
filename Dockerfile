# base image
FROM ubuntu:20.04
RUN apt-get update -y
RUN apt-get install -y python3-pip python3-dev build-essential 

# set working directory
RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

# add requirements (to leverage Docker cache)
ADD ./requirements.txt /usr/src/app/requirements.txt

# install requirements
RUN pip3 install --upgrade --no-cache-dir -r requirements.txt

# copy project
COPY . /usr/src/app

ENV LC_ALL=C.UTF-8  \
    LANG=C.UTF-8
