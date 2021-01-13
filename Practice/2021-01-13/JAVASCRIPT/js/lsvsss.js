function clickCounter() {
    if (typeof(Storage) !== "undefined") {
      if (localStorage.clickcount) {
        localStorage.clickcount = Number(localStorage.clickcount)+1;
      } else {
        localStorage.clickcount = 1;
      }
      document.getElementById("local").innerHTML = "You have clicked the button " + localStorage.clickcount + " time(s).";
    } else {
      document.getElementById("local").innerHTML = "Sorry, your browser does not support web storage...";
    }

    if (typeof(Storage) !== "undefined") {
        if (sessionStorage.clickcount) {
          sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
        } else {
          sessionStorage.clickcount = 1;
        }
        document.getElementById("result").innerHTML = "You have clicked the button " + sessionStorage.clickcount + " time(s) in this session.";
      } else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
      }
  }

