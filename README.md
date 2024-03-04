# Configurações do repositório

## Importante!

<p>
  Este projeto foi gerado a partir do Satis.</br>
  Levei em conta que você já tenha o Docker instalado na sua máquina.
  As instruções abaixo não estão necessáriamente na ordem de execução.
  Qualquer dúvida envie um e-mail para ti.gilvan@gmail.com que eu respondo assim que puder.
</p>
<hr>

#### Caso precise autenticar no gitlab

```
composer config github-oauth.github.com  <API KEY GITHUB>
```

#### Caso precise definir um tempo para a execução do composer
```
 composer config --global process-timeout 2000
```
#### Baixar o php-stan (comando a ser executado dentro de /var/www/html do container)
```
git clone https://github.com/phpstan/phpstan.git php-stan
```

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
cp -R repo /app
```

        
        