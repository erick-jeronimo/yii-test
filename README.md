# Projeto Yii Test

Este é um projeto Yii desenvolvido para [descrição do projeto].

## Configuração

Para configurar e executar este projeto localmente, você pode optar por utilizar Docker. Siga os passos abaixo:

### Pré-requisitos

- Docker
- Docker Compose

### Instalação com Docker

1. **Clone o repositório:**
   ```git clone https://github.com/erick-jeronimo/yii-test.git```
   ```cd yii-test```
   
2. Construa os conteiners docker
   ```docker-compose up -d --build```

3. Execute as migrations do projeto
  ```docker-compose exec php php yii migrate```

4. Verifique o projeto rodando
  ```http://localhost```

### Uso
Carregue o arquivo ```yii.collection.json``` na sua ferramenta favorita (postman, por exemplo), para visualizar as rotas disponíveis
