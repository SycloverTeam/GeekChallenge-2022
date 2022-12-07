From openjdk:8u222-slim

RUN apt-get update -y \
    && apt-get install curl -y \
    && useradd ctf \
    && mkdir /opt/app

COPY Easygame.jar /opt/app
COPY flag /flag

WORKDIR /opt/app

EXPOSE 80

USER ctf
CMD ["java", "-jar", "/opt/app/Easygame.jar"]
