<h1>
<img src="https://cdn.pixabay.com/photo/2017/02/01/12/04/bird-2029969_1280.png" style="width: 200px; float: left"/>

Custom and Simple Satis Server
</h1>

# Configurações do repositório

## Importante!

<p>
  Este projeto foi gerado a partir do Satis.</br>
  Levei em conta que você já tenha o Docker instalado na sua máquina.
  Os comandos abaixo devem ser executados dentro do conteiner PHP criado: meu-composer (Nome dado no docker-compose.yml)
</p>
<hr>

#### Entrar no conteiner
```
docker exec -it <nome do conteiner ou ID> /bin/bash
```

#### Executar o comando de instalação das bibliotecas do composer
```
composer install
```

#### Definir um tempo para a execução do composer
```
 export COMPOSER_PROCESS_TIMEOUT=600
 OU
 composer config --global process-timeout 2000
```


#### Copiar o satis.json para dentro de /satis

#### Caso precise autenticar no gitlab
```
composer config --global github-oauth.github.com <TOKEN>
```

#### Crie o arquivo satis.json com base no modelo satis.json na raiz do projeto dentro de /var/www/html/ do conteiner



#### Rodar a build do Satis
###### Você pode especificar a biblioteca, mas caso queira rodar tudo basta remover a referência nome/biblioteca
```
php bin/satis build satis.json <DIRETORIO DESTINO> <NOME/BIBLIOTECA> 
```

#### Copiar a build e colocar no diretório de leitura do apache 
```
cp -R repo /app
```

#### Remover o diretório da build DEPOIS DE TER SIDO GERADA E COPIADA A BUILD PARA O DIRETÓRIO /APP DO CONTAINER (comando a ser executado dentro de /var/www/html do container)
```
rm -r repo
```

## RUN CRON JOB
<p>Copie o arquivo run.php para dentro do volume /satis</p>
<p>Este arquivo run.php recebe dois parâmetros o valor inicial e o valor final que serve para definir de qual pacote até tal pacote deseja executar a build do Satis. Por exemplo, iniciando na posição 0 até a posição 10 do array da lista de repositories:</p>

```
php run.php 0 10
```
 

        