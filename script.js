const match1 = $("[name='match1']");
const match2 = $("[name='match2']");
const match3 = $("[name='match3']");
const match4 = $("[name='match4']");
const match5 = $("[name='match5']");
const match6 = $("[name='match6']");
const match7 = $("[name='match7']");
const match8 = $("[name='match8']");
const match9 = $("[name='match9']");
const match0 = $("[name='match0']");
const match = $(".match");
const bet = $(".result-bet");
const btn = $(".bet-btn");
const form = $(".form-container");

btn.on("click", (e) => {
  e.preventDefault();

  // for (j = 0; j < 10; j++) {
  //   for (i = 0; i < match0.length; i++) {
  //     if (match0[i].checked) {
  //       result0 = match0[i].value;
  //       break;
  //     }
  //   }
  // }

  for (i = 0; i < match0.length; i++) {
    if (match0[i].checked) {
      result0 = match0[i].value;
      break;
    }
  }
  for (i = 0; i < match1.length; i++) {
    if (match1[i].checked) {
      result1 = match1[i].value;
      break;
    }
  }
  for (i = 0; i < match2.length; i++) {
    if (match2[i].checked) {
      result2 = match2[i].value;
      break;
    }
  }
  for (i = 0; i < match3.length; i++) {
    if (match3[i].checked) {
      result3 = match3[i].value;
      break;
    }
  }
  for (i = 0; i < match4.length; i++) {
    if (match4[i].checked) {
      result4 = match4[i].value;
      break;
    }
  }
  for (i = 0; i < match5.length; i++) {
    if (match5[i].checked) {
      result5 = match5[i].value;
      break;
    }
  }
  for (i = 0; i < match6.length; i++) {
    if (match6[i].checked) {
      result6 = match6[i].value;
      break;
    }
  }
  for (i = 0; i < match7.length; i++) {
    if (match7[i].checked) {
      result7 = match7[i].value;
      break;
    }
  }
  for (i = 0; i < match8.length; i++) {
    if (match8[i].checked) {
      result8 = match8[i].value;
      break;
    }
  }
  for (i = 0; i < match9.length; i++) {
    if (match9[i].checked) {
      result9 = match9[i].value;
      break;
    }
  }

  bet.html(`
    <div class="final-bet-content">
      <div class="name-result"></div>
      <div class="ticket-result">
        <h4>Ticket 1</h4>
        <p>${match[0].innerText} : ${result0}</p>
        <p>${match[1].innerText} : ${result1}</p>
        <p>${match[2].innerText} : ${result2}</p>
        <p>${match[3].innerText} : ${result3}</p>
        <p>${match[4].innerText} : ${result4}</p>
      </div>
      <div class="ticket-result">
        <h4>Ticket 2</h4>
        <p>${match[5].innerText} : ${result5}</p>
        <p>${match[6].innerText} : ${result6}</p>
        <p>${match[7].innerText} : ${result7}</p>
        <p>${match[8].innerText} : ${result8}</p>
        <p>${match[9].innerText} : ${result9}</p>
      </div>
      <div class="btn-result-block">
        <button type="submit" name="bet-form" class="btn btn-result btn-outline-info">Confirm Your Bet !</button>
      </div>
    </div>
    `);
});

$(window).on("load", function () {
  $(".loader-wrapper").fadeOut("slow");
});

const userParam = $(".user-param");
const navLink = $(".nav-link");
const navPhone = $(".nav-phone");

function openParam() {
  userParam[1].classList.toggle("visibility");
}

const upOpenerBtn = $(".update-opener-btn");
const updateForm = $(".update-form-container");
const upCloserBtn = $(".close-update-form");

upOpenerBtn.click(function () {
  updateForm.css("display", "flex");
});

upCloserBtn.click(function () {
  updateForm.css("display", "none");
});

console.log(userParam[1]);
console.log(navLink);
console.log(navPhone);
