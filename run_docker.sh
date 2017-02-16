docker stop conference-title
docker rm conference-title
docker rmi conference-title
docker build -t conference-title .
docker run -p 127.0.0.1:80:80 -d --name conference-title conference-title
