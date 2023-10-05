# Local development with devspace

[DevSpace](https://www.devspace.sh/) is an open-source developer tool for Kubernetes that lets you develop and deploy cloud-native software faster in your own local.

The great advantage of use DevSpace is that you don't need all the tools on your local machine, DevSpace will deploy all the containers inside kubernetes keeping the local code development. 

## Pre-Requirements

- [Rancher Desktop](https://rancherdesktop.io/)(recommended) or [Docker desktop](https://www.docker.com/products/docker-desktop/) + [K3d Cluster](https://k3d.io/)
- [Kubectl](https://kubernetes.io/docs/tasks/tools/)
- [DevSpace CLI](https://www.devspace.sh/)

## Codeweek installation

1. In order to run codeweek properly, on your local, you need to have a ssl certificate and simulate a ".europa.eu" domain. For that we need to generate self-signed certificate for your local.
- Follow [this](https://mixable.blog/create-certificate-for-localhost-domains-on-macos/) tutorial to generate self-signed certificates for your localhost
- Create codeweek namespace
```bash
kubectl create ns codeweek
```
- Create the certificate secret on kubernetes
```bash
kubectl create secret generic certificates-secret --from-file=tls.crt=./localhost.crt --from-file=tls.key=./localhost.key
```

2. Add line into the /etc/hosts file
```bash
127.0.0.1     codeweek.local.europa.eu
```

3. Copy .env.devspace file
```bash
cp /devpace/.env.devspace .env
```

4. After this you can go to the codeweek root directory and type:
```bash
devspace dev
```

- Devspace will ask you a token for github and nova credentials
- Wait for devspace starts and setup everything for you

5. Import and create the database
Create empty database
```bash
devspace run artisan artisan migrate:fresh --seed
```

6. Go to https://codeweek.local.europa.eu