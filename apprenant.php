
<?php
include('db.php');
session_start();
  $getStudentsQuery = "SELECT * FROM etudiant";
  $result = $con -> query($getStudentsQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style >
 
        input[type="search"]::-webkit-search-cancel-button
        {
        -webkit-appearance:none;
        }
        td {
            border-bottom-width: 1px ;
            border-collapse: collapse;
            

        }
       
    </style>
     <script>
        tailwind.config = {
          theme: {
            screens: {
                'md': '768px',
            },
         
            extend: {
              colors: {
                primary: '#5051FA',
                borderColor: '#5f5d5d',
                bgcolor: '#F3F3F3',
                
              },
              fontFamily: {
                'title': ['Poppins','sans-serif'],
                'bigTitle':  ['"Myriad Pro"', 'sans-serif'],
              }
            }
          }
        }
      </script>
</head>

<body >
    <?php include('pageStruct.php')?>
    <section class="p-4 w-full flex flex-col gap-8">
        <?php
            if (isset($_SESSION['error'])) {
                set_time_limit(2);  
                echo $_SESSION['error'];  
                unset($_SESSION['error']);  
            }
            ?>
            
            <div class="flex justify-between items-center px-8">
                <h1>
                    Apprenants
                </h1>
               <div class="flex gap-4">
                    <button class="flex gap-2 items-center border px-4 py-2 rounded-lg text-[#0E2354] ">
                        <img src="./img/Downlaod.svg" alt="">Export
                    </button>
                    <button id="add-etd" onclick=" document.getElementById('modal').style.display = 'flex'" class="flex gap-2 items-center bg-[#4790cd] px-4 py-2 rounded-lg text-white ">
                        <img src="./img/_Avatar add button.svg" alt="">New Student
                    </button>
               </div>
            </div>

            <div class="flex justify-between items-center px-4 border py-4 rounded-lg">
                <div class="flex gap-2">
                    <img src="./img/Search.svg" alt="">
                    <input class="search outline-none border-none w-72 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search Trainers by name...">
                </div>
               <div class="flex gap-4 items-center">
                    <button class="flex gap-2 items-center border px-4 py-2 rounded-lg">
                        <img src="./img/Filters lines.svg" alt="">Filters
                    </button>
                    <div class="flex gap-2">
                        <img class="px-4 py-3 border rounded-lg cursor-pointer" src="./img/Vector.svg" alt="">
                        <img class="px-4 py-2 border rounded-lg cursor-pointer" src="./img/element-3.svg" alt="">
                    </div>
               </div>
            </div>
            <div>
                <table class="w-full border rounded-lg" >
                    <tr class="bg-gray-200 border-b  items-center ">
                    <td class="text-center w-10 "> <input type="checkbox" name="" id=""></td>
                      <td>&nbsp;Name</td>
                      <td>&nbsp;Date De Naissance</td>
                      <td>&nbsp;Ville</td>
                      <td>&nbsp;Telephone</td>
                      <td>&nbsp;Apprenant</td>
                      <td>&nbsp;Action</td>
                    </tr>
                    <?php
                    foreach($result as $row){
                        $id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                        $nom = htmlspecialchars($row['nom'], ENT_QUOTES, 'UTF-8');
                        $date_naissance = htmlspecialchars($row['date_naissance'], ENT_QUOTES, 'UTF-8');
                        $ville = htmlspecialchars($row['ville'], ENT_QUOTES, 'UTF-8');
                        $telephone = htmlspecialchars($row['telephone'], ENT_QUOTES, 'UTF-8');
                        $apprenant = htmlspecialchars($row['apprenant'], ENT_QUOTES, 'UTF-8');
                    echo "<tr>
                        <td class='text-center w-10'> <input type='checkbox' name='' id='' ></td>
                        <td>&nbsp;'$nom'</td>
                        <td>&nbsp;'$date_naissance'</td>
                        <td>&nbsp;'$ville'</td>
                        <td>&nbsp;'$telephone'</td>
                        <td>&nbsp;'$apprenant'</td>
                    <td>
                        <a href='deleteStudent.php?id= ".$row['id']."'>delete</a>
                        <button onclick=\"openEditModal('$id', '$nom', '$date_naissance', '$ville', '$telephone', '$apprenant')\">
                            edit
                        </button>
                    </td>


                    </tr>";
                }
                    ?>

                 
                  </table>

            </div>
 
          
        </section>

    </div>
    <div id="modal" class="modal bg-black bg-opacity-75 hidden items-center justify-center fixed inset-0 z-50 ">
                  <div class="w-full m-8 h-auto border border-2 border-black rounded-3xl bg-white relative z-50 md:w-1/4 ">
                    <svg class=" fill-primary absolute cursor-pointer top-0 right-0 pr-4 pt-2 w-10 h-8"    onclick="document.getElementById('modal').style.display='none'" xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path   d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z"/><path fill="#5051fa" d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l.001-.001l-3.855 3.855l-3.855-3.855A1.091 1.091 0 0 0 6.6 8.145l-.001-.001l3.855 3.855l-3.855 3.855a1.091 1.091 0 1 0 1.541 1.542l.001-.001l3.855-3.855l3.855 3.855a1.091 1.091 0 1 0 1.542-1.541l-.001-.001z"/></svg>
                 
                    <div class="flex flex-col p-4">
                    <h3 class=" flex justify-center items-center" id="modal-title"></h3>
                    <form id="student-form"  method="post" action="addStudent.php" class="flex flex-col pt-16 gap-4">
                      
                      <select value="" class="border border-2 border-gray-200 rounded-lg p-2" id = "apprenant-list" name="apprenant-input" >  
                        <option id="apprenant" disabled checked > ------ </option>  
                        <option value="A1" > A1 </option>  
                        <option value="A2"> A2 </option>  
                        </select>  
                        <div class="flex flex-col">
                      <label for="name-input">Nom</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="name-input" name="name-input" >
                    </div>

                      <div class="flex flex-col">
                      <label for="date-input">Date de Naissance</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="date" id="date-input" name="date-input"  >
                    </div>
                    <div class="flex flex-col">
                      <label for="ville-input">Ville</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="ville-input" name="ville-input" >
                    </div>
                    <div class="flex flex-col">
                      <label for="phone-input">Telephone</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="phone-input" name="phone-input" >
                    </div>
                  
                    <button type="submit" name="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Add Student
                    </button>                    
                  </form>
                  </div>
          
                  </div>
              </div>
</div>
<!-- Modal Edit -->
<div id="modalEdit" class="modal bg-black bg-opacity-75 hidden items-center justify-center fixed inset-0 z-50 ">
                  <div class="w-full m-8 h-auto border border-2 border-black rounded-3xl bg-white relative z-50 md:w-1/4 ">
                    <svg class=" fill-primary absolute cursor-pointer top-0 right-0 pr-4 pt-2 w-10 h-8"    onclick="document.getElementById('modalEdit').style.display='none'" xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path   d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z"/><path fill="#5051fa" d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l.001-.001l-3.855 3.855l-3.855-3.855A1.091 1.091 0 0 0 6.6 8.145l-.001-.001l3.855 3.855l-3.855 3.855a1.091 1.091 0 1 0 1.541 1.542l.001-.001l3.855-3.855l3.855 3.855a1.091 1.091 0 1 0 1.542-1.541l-.001-.001z"/></svg>
                 
                    <div class="flex flex-col p-4">
                    <h3 class=" flex justify-center items-center" id="modal-title"></h3>
                    <form id="student-form-edit"  method="post" action="updateStudent.php" class="flex flex-col pt-16 gap-4">
                      
                      <select value="" class="border border-2 border-gray-200 rounded-lg p-2" id = "apprenant-list-edit" name="apprenant-input-edit" >  
                        <option id="apprenant" disabled checked > ------ </option>  
                        <option value="A1" > A1 </option>  
                        <option value="A2"> A2 </option>  
                        </select>  
                        <input type="hidden" id="id-edit" name="id-edit" >
                        <div class="flex flex-col">
                      <label for="name-input-edit">Nom</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="name-input-edit" name="name-input-edit" >
                    </div>

                      <div class="flex flex-col">
                      <label for="date-input-edit">Date de Naissance</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="date" id="date-input-edit" name="date-input-edit"  >
                    </div>
                    <div class="flex flex-col">
                      <label for="ville-input-edit">Ville</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="ville-input-edit" name="ville-input-edit" >
                    </div>
                    <div class="flex flex-col">
                      <label for="phone-input-edit">Telephone</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="phone-input-edit" name="phone-input-edit" >
                    </div>
                  
                    <button type="submit" name="edit-submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Modify Student
                    </button>                    
                  </form>
                  </div>
          
                  </div>
              </div>
              
</div>
             
        <script>
                document.getElementById('btn-drop-side').addEventListener("click", function(){
                const cont = document.getElementById("drop-container")
                if (cont.style.display == 'none'){
                    document.getElementById('btn-drop-side').className = 'flex gap-4 bg-[#000000] text-[#ffffff] transition-all px-4 py-2 rounded-2xl'
                    document.getElementById('btn-icon').setAttribute('src', './img/3 User hover.svg')

                    cont.style.display="block"

                }
                else {
                    document.getElementById('btn-drop-side').className = 'flex gap-4 transition-all px-4 py-2 rounded-2xl'
                    document.getElementById('btn-icon').setAttribute('src', './img/3 User.svg')
                    cont.style.display="none"
                }

            })

            document.getElementById("add-etd").addEventListener('click', function(){
                console.log('aa')
                document.getElementById("modal").style.display = "flex";
            })
            function openEditModal(id,nom,date_naissance,ville,telehpone,apprenant){
                document.getElementById('modalEdit').style.display='flex'
                document.getElementById('id-edit').value = id
                document.getElementById('name-input-edit').value = nom;
                document.getElementById('date-input-edit').value = date_naissance;
                document.getElementById('ville-input-edit').value = ville;
                document.getElementById('phone-input-edit').value = telehpone;
                document.getElementById('apprenant-list-edit').value = apprenant;
            }

        </script>
</body>
</html>

<?php
//  class person {
//     private $nom;
//     private $age;
//     public function __construct($nom,$age){
//         $this -> nom = $nom;
//         $this -> age = $age;
//     }
    
//     public function __toString(){
//         echo "mon nom est".$this->nom.", mon age est: ".$this->age;
//         }
//         public function getNom() : string {
//             return $this->nom;
            
//         }
//         public function equals($name) : bool {
//             return $this->nom === $name;
            
//         }

// }
// // $p = new person ("imad", 16);
// // echo $p;
// // if ($p->equals("imad"))
// echo "eqauls";
// else
// echo "not" ?>