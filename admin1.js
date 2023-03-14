
























let u=document.getElementById("p");
u.addEventListener('click',dropi=>{   

    let y=document.querySelector(".drp")
    let l=document.querySelector(".lis") 
    y.classList.toggle("z1")
    y.classList.add("nw")
    l.classList.toggle("z1")
    l.classList.add("lis")
    let p=document.getElementById("bo")
    p.style.marginBottom="1px"

})

let bari=document.getElementById("bar");
let maha=document.querySelector(".hero");


bari.addEventListener('click',dora=>{
   
    let ra=document.querySelector(".sidebar")

    maha.classList.toggle("hero1")
console.log("ayyo")
    
  

    ra.classList.toggle("sideba")
      
   
})