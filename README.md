<h1>
<img src="https://cdn.pixabay.com/photo/2017/02/01/12/04/bird-2029969_1280.png" style="width: 200px; float: left"/>

Custom and Simple Satis Server
</h1>

# Configurações do repositório

## Importante!

<p>
  Este projeto foi gerado a partir do Satis.</br>
  Levei em conta que você já tenha o Docker instalado na sua máquina.
  Os comandos abaixo devem ser executados dentro do conteiner PHP criado
</p>
<hr>

#### Entrar no conteiner
```
docker exec -it <nome do conteiner ou ID> /bin/bash
```

#### Definir um tempo para a execução do composer
```
 export COMPOSER_PROCESS_TIMEOUT=600
 OU
 composer config --global process-timeout 2000
```


#### Criar o projeto do satis dentro do conteiner
<p>Criar um projeto do satis dentro de /var/www/html do conteiner</p>
<p>Importante! O projeto do satis deve estar em /var/www/html</p>

```
composer create-project composer/satis:dev-main .
composer install
```
#### Copiar o satis.json para dentro de /satis

#### Caso precise autenticar no gitlab
```
composer config github-oauth.github.com  <API KEY>
```

#### Crie o arquivo satis.json com base no modelo satis.json na raiz do projeto dentro de /var/www/html/ do conteiner



#### Rodar a build do Satis
```
php bin/satis build satis.json repo
```

#### Copiar a build e colocar no diretório de leitura do apache 
```
cp -R repo /app
```

#### Remover o diretório da build DEPOIS DE TER SIDO GERADA E COPIADA A BUILD PARA O DIRETÓRIO /APP DO CONTAINER (comando a ser executado dentro de /var/www/html do container)
```
rm -r repo
```

        
        