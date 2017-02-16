# env setup
minikube start --vm-driver=xhyve
eval $(minikube docker-env)

# initial build/deploy
docker build -t conference-title:v2 .
kubectl run conference-title --image=conference-title:v2 --port=80
kubectl expose deployment conference-title --type=LoadBalancer

# access
minikube service conference-title

# upgrade
docker build -t conference-title:v3 .
kubectl set image deployment/conference-title conference-title=conference-title:v3

# teardown
kubectl delete service,deployment conference-title
minikube stop
eval $(minikube docker-env -u)
