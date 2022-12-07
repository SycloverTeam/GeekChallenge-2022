FROM bitnami/express

RUN mkdir /tmp/src 
COPY src /tmp/src

EXPOSE 80

CMD [ "bash","-c","cd /tmp/src&&npm install express express-session body-parser && node index.js" ]