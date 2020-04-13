FROM httpd:alpine
MAINTAINER @ozgurozturknet (ozgur@ozgurozturk.net)

RUN apk add htop gzip iputils curl apache2 tree openjdk7-jre
RUN apk update && apk upgrade

WORKDIR /usr/src/myapp
COPY /myapp .
RUN echo "<html><body><h1>A'dan Z'ye Docker Egitimine Hosgeldiniz.</h1></body></html>" > /usr/local/apache2/htdocs/index.html