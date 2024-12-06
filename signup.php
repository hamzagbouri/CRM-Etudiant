<?php
include('db.php');
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $fullname = trim(htmlspecialchars($_POST['fullname']));
    $email = trim(htmlspecialchars($_POST['email']));
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));
    $hash = password_hash($password,  
          PASSWORD_DEFAULT); 
    try {
        $statment = $con->prepare("INSERT INTO `admin`(`username`, `password`,`name`, `email`) VALUES (?, ?,?,?)");
        $statment->bind_param("ssss", $username, $hash,$fullname,$email);
        $statment-> execute();
        $statment->close();
        header('Location: login.php');
    } catch (Exception $e){

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<body>
     <div id="login" class="modal flex items-center justify-center fixed inset-0 z-50 bg-no-repeat bg-cover bg-[url('img/image.png')] ">
         <div class="w-full m-8  h-3/5 border flex flex-col items-center justify-between pb-4  rounded-lg backdrop-blur-sm relative z-50 md:w-1/5 ">
            <div class="flex w-full justify-center h-[15%] items-center">
            <h1 class="text-white text-2xl font-bold	tracking-widest	 ">SIGN UP</h1> 
            </div>
            <form  class="" method="post" >
                <div  class="h-[90%] w-full gap-4 flex flex-col ">
                <div class="flex flex-col justify-center">
                    <div class="flex gap-2 items-center">
                        <img class="w-4 h-4" src="img/user.png" alt="user_logo">
                        <label for="fullname">Full Name</label>
                    </div>
                    
                    <input type="text" id="fullname" name="fullname" class="outline-none w-64 opacity-4 bg-transparent border-2 rounded-lg px-2 py-1 border-black">
                </div>
                <div class="flex flex-col justify-center">
                    <div class="flex gap-2 items-center">
                        <img class="w-4 h-4" src="img/user.png" alt="user_logo">
                        <label for="email">Email</label>
                    </div>
                    
                    <input type="text" id="email" name="email" class="outline-none w-64 opacity-4 bg-transparent border-2 rounded-lg px-2 py-1 border-black">
                </div>
                
                <div class="flex flex-col justify-center">
                    <div class="flex gap-2 items-center">
                        <img class="w-4 h-4" src="img/user.png" alt="user_logo">
                        <label for="username">Username</label>
                    </div>
                    
                    <input type="text" id="username" name="username" class="outline-none w-64 opacity-4 bg-transparent border-2 rounded-lg px-2 py-1 border-black">
                </div>
            
                <div class="flex flex-col">
                <div class="flex gap-2 items-center">
                        <img class="w-4 h-4" src="img/Padlock.png" alt="password_logo">
                        <label for="password">Password</label>
                    </div>
                    <input type="password" id="password" name="password" class="outline-none w-64 opacity-4 bg-transparent border-2 rounded-lg px-2 py-1 border-black">
                </div>
                <div class="flex justify-center bg-black mt-8 p-2 rounded-xl">
                <button type="submit" name="submit" class="text-white">
                SIGNUP
            </button>
                </div>
                <div class="flex justify-center hover:underline">
                    <a href="">Forgot your password?</a>
                </div>
                </div>
            </form>
            <div class=" text-[#ff0000]">
                <p>
                <?php
            if (isset($message)) {
              
                echo $message;  
                unset($message);  
            }
            ?>
                </p>
            </div>
                
                
        </div>
    </div>
</body>
</html>