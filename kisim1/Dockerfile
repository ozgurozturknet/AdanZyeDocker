FROM openjdk:7 AS builder
COPY ./source /usr/src/myapp
WORKDIR /usr/src/myapp
RUN javac app1.java


FROM anapsix/alpine-java
WORKDIR /usr/src/myapp
COPY --from=builder /usr/src/myapp .
CMD ["java", "app1"]