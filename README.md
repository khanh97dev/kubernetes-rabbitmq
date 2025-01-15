# Required
- Docker: ^20.10.0
# Kind
- Install
```
curl -Lo kind https://kind.sigs.k8s.io/dl/v0.17.0/kind-linux-amd64
chmod +x ./kind
sudo mv ./kind /usr/local/bin/
```
# Cluster
- Port mapping
    - containerPort: 8000
    - hostPort: 8000
    - curl http://localhost:8000

- Install
```
kind create cluster --config kind-config.yaml
```
- Delete
    - name: kind-config.yaml | name: ...
```
kind delete cluster --name {kind-demo}
```
# Deployment
- Rabbitmq
```
set F rabbitmq-deployment.yaml ; kubectl delete -f $F; kubectl apply -f $F
```
- Process
```
set F process-deployment.yaml ; kubectl delete -f $F; kubectl apply -f $F
```
- Web
```
set F web-deployment.yaml ; kubectl delete -f $F; kubectl apply -f $F
```

# URL
- http://localhost:8000/index.php
