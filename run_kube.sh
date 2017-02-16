minikube start --vm-driver=xhyve
eval $(minikube docker-env)
docker build -t conference-title:v2 .
kubectl run conference-title --image=conference-title:v2 --port=80
kubectl expose deployment conference-title --type=LoadBalancer
minikube service conference-title
