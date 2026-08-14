# 💻 Criando um Projeto Java com VS Code

## Pré-requisitos

- Extensão **Extension Pack for Java** (Microsoft)
- Extensão **Spring Boot Extension Pack** (para projetos Spring)
- JDK instalado e configurado

## Passo a passo

1. Abra o VS Code
2. Pressione `Ctrl + Shift + P` para abrir a paleta de comandos
3. Digite e selecione **Spring Initializr: Generate a Maven Project** (ou Gradle)
4. Escolha a **linguagem**: Java, Kotlin ou Groovy
5. Informe o **Group Id** e o **Artifact Id**
6. Selecione a **versão do Spring Boot**
7. Selecione a **versão do Java**
8. Escolha as **dependencies** (Spring Web, Lombok, DevTools etc.) e confirme com Enter
9. Escolha a pasta onde o projeto será salvo
10. O VS Code gera o projeto e pergunta se deseja abri-lo na janela atual ou em uma nova

> 💡 Por trás dos panos, essa extensão do VS Code consome a mesma API do site **start.spring.io** (Spring Initializr).

---
⬅️ [Voltar ao README principal](../README.md)
