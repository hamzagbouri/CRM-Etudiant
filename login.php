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
     <div id="login" class="modal flex items-center justify-center fixed inset-0 z-50 bg-no-repeat bg-cover bg-[url('img/bg.png')] ">
         <div class="w-full m-8  h-3/5 border flex flex-col   rounded-lg backdrop-blur-sm relative z-50 md:w-2/5 ">
            <div class="flex w-full justify-center h-[15%] items-center">
            <h1 class="text-white text-2xl font-bold	tracking-widest	 ">Login</h1> 
            </div>
            <form action="" class="" method="" class="h-[90%]  flex flex-col " >
                <div class="flex flex-col">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="outline-none">
                </div>
                <div class="flex flex-col">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="">
                </div>
            <button type="submit" name="submit">
                Login
            </button>
            </form>
                
                
        </div>
    </div>
</body>
</html>