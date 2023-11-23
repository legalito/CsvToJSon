# Convertisseur de fichier CSV ou XML en JSON sous PHP

Ce projet à pour objectif de convertir un fichier CSV ou XML au choix en JSON par le biais d'une interface web.

## Installation

1. Clonez le dépôt :

    ```bash
    git clone https://github.com/legalito/CsvToJSon.git
    ```
2. Placez le répertoire du projet dans le répertoire www de votre installation WampServer.

3. Ouvrez votre navigateur et accédez à `http://localhost/CSVToCSV/CsvToJSon/` (ou utilisez le chemin approprié en fonction de votre configuration WampServer).

## Utilisation

1. Depuis la première url vous pouvez convertir un fichier CSV en JSON

2. Uploadez votre fichier CSV en utilisant le formulaire sur l'interface web.

3. Cliquez sur le bouton "Convertir" pour lancer la conversion.

4. Le résultat de la conversion (JSON) sera téléchargeable sur la page.

5. En se rendant sur l'url http://localhost/CSVToCSV/CsvToJSon/version-2.php vous aurez accès au même formulaire mais qui cette fois prend en charge les fichiers xml également.

6. Uploadez votre fichier CSV en utilisant le formulaire sur l'interface web.

7. Cliquez sur le bouton "Convertir" pour lancer la conversion.

8. Le résultat de la conversion (JSON) sera téléchargeable sur la page.


## Explication des fichiers

### `index.php`

Ce fichier est la première version du convertisseur CSV en JSON. Il contient l'interface  ainsi que le script qui convertis le fichier.

Dans ce fichier on peut retrouver :

  - ** Formulaire HTML :** dedans on va retrouver un form qui sera en method POST au submit de l'input "Convertir", on peut retrouver également un input de type qui a pour nom "filename" qui permet l'upload de fichier.

  - ** Script PHP :** il permet de vérifier que une fois le bouton submit cliquer cela récupère le nom du fichier dans un premier temps, puis ensuite  l'ouvre afin de récupérer ces informations et grâce à la fonction fgetcsv afin de lire les lignes du document et de les parse pour renvoyer tout cela dans un tableau. Ensuite grâce à la fonction array_combine  à partir de notre tableau de clé et notr tableau de valeur qu'on combine pour avoir un seul tableau qu'on va ensuite encode en json pourmettre le fichier au final dans le projet

### `version-2.php`

le fichier version-2.php est le fichier principale du projet il contient l'interface web qui permet à l'utilisateur d'interagir et de convertir le fichier souhaiter

les éléments que l'on peut retrouver dans ce fichier :

 - **Formulaire HTML :** dedans on va retrouver un form qui sera en method POST au submit de l'input "Convertir", on peut retrouver également un input de type qui a pour nom "filename" qui permet l'upload de fichier.

- **Script PHP :** Permet dans un premier temps d'importer la class conversion.php. Ensuite on vérifie si le bouton submit à bien été utiliser, une fois cliquer on instancie la class conversion avec en paramètre le fichier qui à été uploader.
Ensuite on vérifie qu'on est bien un nom a filename ce qui veux dire que le fichier à été convertir. si il est différent de null alors on affiche la ligne avec dedans le fichier à télécharger.

### `conversion.php`

le fichier conversion.php est une class Conversion qui gère tout la tranformation du fichier uplaoder par l'utilisateur jusqu'à la création du json.

les éléments que l'on peut retrouver dans ce fichier :

- **Variables :** 

  - $file : permet de stocker les informations du fichier pour csv il est en private car il n'est utiliser que dans la class

  - $filename: permet de stocker le nom du fichier sans son extension afin de pouvoir l'appeler dans le fichier version-2.php pour permettre de télécharger le fichier concerné.

  - $json : permet d'enregistrer les informations d'un fichier qui sera encoder en json 

  - $dataArray : permet de stocker dans un tableau les titres d'un csv combiner à chaque ligne correrspondantes.

- **Méthode constructeur :** Initialise la classe en appelant la méthode `getFile` avec le fichier importé.

- **Méthode getFile :** prend en variable le fichier importer et permet de détecter si c'est un fichier CSV ou XML et lancer les bonnes fonction correspondantes à l'extension du fichiers.

- **Méthode converCSV :** Convertis le fichier csv donner par l'utilisateur en utilisant la fonction fgetcsv 

- **Méthode convertXML :** permet d'enrigistrer les données du xml grâce à la fonction simplexml_load_file dans la variable dataArray.

- ** Méthode createJSON :** est appeler dans les méthodes "convertCSV" et "convertXML" afin d'encoder les donnée reçu dans un premier temps puis ensuite on vérifie si le fichier FileConvert existe bien si non on le recrée afin de pouvoir ensuite enregistrer les fichier convertis dedans.


## Avertissement

Assurez-vous d'avoir une sauvegarde de vos fichiers avant de les convertir, car le processus de conversion peut écraser les fichiers existants.

## Contributions

Les contributions sont les bienvenues ! N'hésitez pas à ouvrir une pull request.

## Licence

Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus d'informations.