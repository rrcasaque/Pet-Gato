document.querySelector("header>.menu").addEventListener("click", (e) => {
    if (document.querySelector("header>.menu").getAttribute("estado") == "fechado") {
        document.querySelector("header>.menu>div:nth-child(1)").setAttribute("class", "animarBarra1");
        document.querySelector("header>.menu>div:nth-child(2)").setAttribute("class", "animarBarra2");
        document.querySelector("header>.menu>div:nth-child(3)").setAttribute("class", "animarBarra3");
        document.querySelector("header>.menu").setAttribute("estado", "aberto");
        document.querySelector("header>nav").setAttribute("class", "navAberto");
    } else {
        document.querySelector("header>.menu>div:nth-child(1)").setAttribute("class", "retornarBarra1");
        document.querySelector("header>.menu>div:nth-child(2)").setAttribute("class", "retornarBarra2");
        document.querySelector("header>.menu>div:nth-child(3)").setAttribute("class", "retornarBarra3");
        document.querySelector("header>.menu").setAttribute("estado", "fechado");
        document.querySelector("header>nav").setAttribute("class", "navFechado");
    }
})

document.querySelectorAll("#nav-desk>span:not(#nav-desk>span:last-child)").forEach(element => {
    element.addEventListener(("mousemove"), (e) => {                               
            element.children[3].setAttribute("class", "menuDeskAberto");            
    })
    element.addEventListener(("mouseout"), (e) => {                        
        element.children[3].setAttribute("class", "menuDeskFechado");                
    })
})

document.querySelector("#nav-desk>span:nth-child(4)").addEventListener("mousemove", (e) => {
    document.querySelector("#nav-desk>span:nth-child(4)>ul").setAttribute("class", "menuDeskAberto2");
})

document.querySelector("#nav-desk>span:nth-child(4)").addEventListener("mouseout", (e) => {
    document.querySelector("#nav-desk>span:nth-child(4)>ul").setAttribute("class", "menuDeskFechado2");
})

document.querySelectorAll('#formsBusca1>form>.campos>select').forEach(element=>{
    element.addEventListener(("change"), (e)=>{
        e.target == document.querySelectorAll('#formsBusca1>form>.campos>select')[0]?document.querySelectorAll('#formsBusca1>form>.campos>select')[1].value="---":document.querySelectorAll('#formsBusca1>form>.campos>select')[0].value="---";
    })
})