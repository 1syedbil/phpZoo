<!--
FILE          : animals.php
PROJECT       : WDD A02 - Animal Serve in PHP
PROGRAMMER    : Bilal Syed
FIRST VERSION : 2024-10-10
DESCRIPTION   : This file contains the code for the PHP page which displays the image and information of the animal
                that the user chose in the form from the previous page. It remembers the user's name and their animal
                choice by using the "hidden" save state method. It saves the name and animal values by using their 
                attribute names from the previous form as keys. It uses javascript to actually display the animal's
                image and its info.
-->

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Animal-Serve 2</title>

        <style>
            /*class used to center the table element*/
            .center {
                margin-left: auto; 
                margin-right: auto;
            }
        </style>
    </head>

    <body style="background-image: url('theZoo/background2.jpg');background-repeat: no-repeat;background-size: 100% 100%;min-height: 100vh;">
        <?php
            $fname=$_POST["fname"];       //save the value of the element with the name attribute value of "fname" in $fname
            $fanimal=$_POST["fanimal"];   //save the value of the element with the name attribute value of "fanimal" in $fanimal
        ?>

        <h1 style="text-align:center;font-size: 55px;"><strong>Hello <?php print($fname)?>, looks like you chose the <?php print($fanimal)?>!</strong></h1>
        
        <div>
            <table border="4" class="center">
                <tr style="background-color:orange;">
                    <td>
                        <img id="animalImg" name="<?php print($fanimal)?>" style="width:400px;height:400px;">
                        <script>
                            var animalPic = document.getElementById("animalImg").name;         //save the value of the name attribute of the image element in a variable

                            //if the name of the image element is giraffe 
                            if (animalPic === "giraffe"){
                                getImage("theZoo/giraffe_img.jpg", "Picture of giraffe.");     //display the giraffe image
                            }
                            //if the name of the image element is lion
                            else if(animalPic === "lion"){
                                getImage("theZoo/lion_img.jpg", "Picture of lion.");           //display the lion image
                            }
                            //if the name of the image element is elephant
                            else if(animalPic === "elephant"){
                                getImage("theZoo/elephant_img.jpg", "Picture of elephant.");   //display the elephant image
                            }
                            //if the name of the image element is gazelle
                            else if(animalPic === "gazelle"){
                                getImage("theZoo/gazelle_img.jpg", "Picture of gazelle.");     //display the gazelle image
                            }
                            //if the name of the image element is meerkat
                            else if(animalPic === "meerkat"){
                                getImage("theZoo/meerkat_img.jpg", "Picture of meerkat.");     //display the meerkat image
                            }
                            //if the name of the image element is mandrill
                            else if(animalPic === "mandrill"){
                                getImage("theZoo/mandrill_img.jpg", "Picture of mandrill.");   //display the mandrill image
                            }

                            /*
                             * FUNCTION    : getImage()
                             * DESCRIPTION : This function sets the src attribute of the image element to the appropriate filepath
                             *               as well as sets the alt attribute of the image element appropriately. What the attributes
                             *               are set to depends on the animal that the user chose on the previous page.
                             * PARAMETERS  : string filePath - the filePath of the image source
                             *               string altText  - the alternate text which is displayed in the event the image cannot load
                             * RETURNS     : nothing
                             */
                            function getImage(filePath, altText){
                                document.getElementById("animalImg").src = filePath;
                                document.getElementById("animalImg").alt = altText;
                            }
                        </script>
                    </td>

                    <td id="animalInfo" data-name="<?php print($fanimal)?>"></td>
                    <script>
                        var animalDesc = document.getElementById("animalInfo").dataset.name;   //save the value of the name attribute of the table cell in a variable
                        
                        //if the name of the cell element is giraffe
                        if (animalDesc === "giraffe"){
                            getDesccription("theZoo/giraffe_desc.txt");    //set the innerHTML of the cell to the giraffe description
                        }
                        //if the name of the cell element is lion
                        else if (animalDesc === "lion"){
                            getDesccription("theZoo/lion_desc.txt");       //set the innerHTML of the cell to the lion description
                        }
                        //if the name of the cell element is elephant
                        else if (animalDesc === "elephant"){
                            getDesccription("theZoo/elephant_desc.txt");   //set the innerHTML of the cell to the elephant description
                        }
                        //if the name of the cell element is gazelle
                        else if (animalDesc === "gazelle"){
                            getDesccription("theZoo/gazelle_desc.txt");    //set the innerHTML of the cell to the gazelle description
                        }
                        //if the name of the cell element is meerkat
                        else if (animalDesc === "meerkat"){
                            getDesccription("theZoo/meerkat_desc.txt");    //set the innerHTML of the cell to the meerkat description
                        }
                        //if the name of the cell element is mandrill
                        else if (animalDesc === "mandrill"){
                            getDesccription("theZoo/mandrill_desc.txt");   //set the innerHTML of the cell to the mandrill description
                        }

                        /*
                             * FUNCTION    : getDescription()
                             * DESCRIPTION : This function retreives the appropriate text file and writes the contents of it
                             *               to the innerHTML of the cell element meant to contain the animal's description.
                             * PARAMETERS  : string filePath - the filePath of the text file containing the animal's description
                             * RETURNS     : nothing
                             */
                        function getDesccription(filePath){
                            //get the file using the filePath
                            fetch(filePath)
                                //retreive the contents of the file as a string/text
                                .then(response => response.text())   
                                //write the contents of the file into the innerHTML of the cell meant to contain the animal's description                   
                                .then(data => {
                                document.getElementById("animalInfo").innerHTML = data;
                                })
                        }
                    </script>
                </tr>
            </table>
            
        </div>
    </body>

</html>