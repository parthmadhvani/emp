const btn = document.querySelectorAll(".dash");

for (let i = 0; i < btn.length; i++) {
  btn[i].addEventListener("click", function () {
    clicked(i);
  });
}

function clicked(a) {
  const address = btn[a].getAttribute("value");
  window.location.href = address;
}

// alert("hello succ");

// success();

function success() {
  // alert("succcccc")
  const succ = document.querySelector(".alerts #success");
  setTimeout(showFun, 0);
  function showFun() {
    succ.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    succ.classList.remove("alerts-show");
  }
}

function fail() {
  const dan = document.querySelector(".alerts #danger");
  setTimeout(showFun, 0);
  function showFun() {
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

function editSuc() {
  const dan = document.querySelector(".alerts #success");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Edited successfully.";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function inValidId() {
  const dan = document.querySelector(".alerts #danger");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Please enter a valid Emp ID !";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}

function assignSuc() {
  const dan = document.querySelector(".alerts #success");
  setTimeout(showFun, 0);
  function showFun() {
    dan.innerHTML = "Assigned successfully.";
    dan.classList.add("alerts-show");
    setTimeout(hideFun, 2000);
  }

  function hideFun() {
    dan.classList.remove("alerts-show");
  }
}