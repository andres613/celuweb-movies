FROM nginx:latest

ENV HOME=/home/nginx

RUN mkdir -p ${HOME}
RUN apt-get update --fix-missing && apt-get install -y \
    vim curl || true \
    && rm -rf /tmp/*

WORKDIR ${HOME}
