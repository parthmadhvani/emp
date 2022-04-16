const btn = document.querySelectorAll(".dash");

for(let i=0;i<btn.length;i++){
    btn[i].addEventListener("click",function(){
      clicked(i);
    });  
}

function clicked(a){
    const add = btn[a].getAttribute("value");
    window.location.href = add;
}

function editSuc() {
  const dan = document.querySelector(".alerts #success");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Updated successfully.";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function duplicate() {
  const dan = document.querySelector(".alerts #danger");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Email is already taken !";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function passUnSuc() {
  const dan = document.querySelector(".alerts #danger");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Couldn't change the password! Please try again.";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function verPass() {
  const dan = document.querySelector(".alerts #danger");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Password confirmation didn't match !";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function inCorPass() {
  const dan = document.querySelector(".alerts #danger");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Incorrect password !";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function passSuc() {
  const dan = document.querySelector(".alerts #success");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Your password changed successfully.";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function leaveSuc() {
  const dan = document.querySelector(".alerts #success");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Your request has been sent.";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function leaveFail() {
  const dan = document.querySelector(".alerts #danger");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Can't sent the request !";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}