<?php
include('db.php');
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = $con-> query("SELECT * from admin where `id` = $id");
    $row = $result-> fetch_assoc();


}else {
    header('Location: login.php');
}
?>
<div class="flex min-h-screen h-full ">
    <aside class="w-52 border-r min-h-full  flex flex-col items-center gap-16 ">
        <div class="mt-16">
            <img src="./img/youcode_logo_dark.png" alt="">
        </div>
        <div class="">
            <div class="grid gap-4 w-[100%]">
                <a href="index.php" class="flex gap-4 px-4 py-2 rounded-2xl"><img src="./img/home.svg" alt=""> Dashboard </a>
                <a href="trainers.php" class="flex gap-4 px-4 py-2 rounded-2xl"><img src="./img/briefcase.svg" alt=""> Trainers </a>
                <a href="apprenant.php" class="flex gap-4 px-4 py-2 rounded-2xl"><img id="btn-icon" class="mt-1" src="./img/3 User.svg" alt=""> Students</a>
                <a href="#" class="flex gap-4 px-4 py-2 rounded-2xl"><img src="./img/Settings_Future.svg" alt=""> Settings </a>
            </div>
        </div>
    </aside>
    <div class="grow">
        <header class=" h-20 border-b">
            <nav class=" h-full flex justify-between mx-8 items-center">
                <div class="flex gap-2">
                    <img src="./img/Search.svg" alt="">
                    <input class="search outline-none border-none w-64 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search anything here">
                </div>
                <div class="flex w-72 justify-between  items-center ">
                    <img class="cursor-pointer" src="./img/settings.svg" alt="">
                    <img class="cursor-pointer" src="./img/Icon.svg" alt="">
                    <form action="logout.php" action="post">
                        <button><img src="img/logout.png" class="h-4 w-4" alt=""></button>
                    </form>
                    <div class="flex items-center gap-2 cursor-pointer">
                        <div class=" cursor-pointer w-10 h-10 bg-[url('img/Ana.jpg')] bg-cover rounded-full text-white relative ">
                        <div class="bg-[#228B22] h-3 w-3 rounded-full absolute bottom-0 right-0  "></div>
                        </div>
                       <p class="text-[#606060] font-bold"> <?php echo $row['name']  ?> </p>
                    </div>
                   
                </div>
    
            </nav>
        </header>
       