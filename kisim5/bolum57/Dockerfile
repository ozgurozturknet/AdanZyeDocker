FROM mcr.microsoft.com/java/jdk:8-zulu-alpine
COPY /source /usr/src/uygulama
WORKDIR /usr/src/uygulama
RUN javac uygulama.java
CMD ["java", "uygulama"]