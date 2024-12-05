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
function openEditModal(id,nom,date_naissance,ville,telehpone,apprenant){
    document.getElementById('modalEdit').style.display='flex'
}
document.getElementById("add-etd").addEventListener('click', function(){
    console.log('aa')
    document.getElementById("modal").style.display = "flex"
})
