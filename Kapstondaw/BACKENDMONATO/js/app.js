$(".searchBar").on("keyup", function () {
  var value = $(this).val().toLowerCase();
  $("table tbody tr").filter(function () {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
});

// $(".edit").each(function() {
//   $(this).on("click", (e) => {
//     e.preventDefault()
//     $(".modal-editResidents").show()
//   })
// })

// $(".closeBtnEdit").on("click", () => {
//   $(".modal-editResidents").hide()
// })

function editOfficial(that) {
  id = $(that).attr("data-id");
  na = $(that).attr("data-name");
  chair = $(that).attr("data-chair");
  pos = $(that).attr("data-pos");
  start = $(that).attr("data-start");
  end = $(that).attr("data-end");
  status = $(that).attr("data-status");

  $("#official_id").val(id);
  $("#fullname1").val(na);
  $("#chairmanship1").val(chair);
  $("#position1").val(pos);
  $("#term-start1").val(start);
  $("#term-end1").val(end);
  $("#status1").val(status);
}

function editResident(that) {
  id = $(that).attr("data-id");
  fname = $(that).attr("data-fname");
  mname = $(that).attr("data-mname");
  lname = $(that).attr("data-lname");
  age = $(that).attr("data-age");
  gender = $(that).attr("data-gender");
  houseNo = $(that).attr("data-houseNo");
  street = $(that).attr("data-street");
  subD = $(that).attr("data-subdivision");
  dbirth = $(that).attr("data-dbirth");
  pbirth = $(that).attr("data-pbirth");
  cstatus = $(that).attr("data-cstatus");
  occu = $(that).attr("data-occupation");
  email = $(that).attr("data-email");
  contact = $(that).attr("data-contactNo");
  vstatus = $(that).attr("data-vstatus");
  identified = $(that).attr("data-identified");
  sector = $(that).attr("data-sector");
  citizen = $(that).attr("data-citizenship");
  hholdNo = $(that).attr("data-householdNo");
  osy = $(that).attr("data-osy");
  pwd = $(that).attr("data-pwd");

  mfname = $(that).attr("data-mfname");
  mmname = $(that).attr("data-mmname");
  mlname = $(that).attr("data-mlname");
  mage = $(that).attr("data-mage");
  mhouseNo = $(that).attr("data-mhouseNo");
  mstreet = $(that).attr("data-mstreet");
  msubD = $(that).attr("data-msubdivision");
  mhholdNo = $(that).attr("data-mhouseholdNo");

  ffname = $(that).attr("data-ffname");
  fmname = $(that).attr("data-fmname");
  flname = $(that).attr("data-flname");
  fage = $(that).attr("data-fage");
  fhouseNo = $(that).attr("data-fhouseNo");
  fstreet = $(that).attr("data-fstreet");
  fsubD = $(that).attr("data-fsubdivision");
  fhholdNo = $(that).attr("data-fhouseholdNo");

  $("#indetity").prop("disabled", false);

  $("#id").val(id);
  $("#firstname").val(fname);
  $("#middlename").val(mname);
  $("#lastname").val(lname);
  $("#age").val(age);
  $("#gender").val(gender);
  $("#house-no").val(houseNo);
  $("#street").val(street);
  $("#subdivision").val(subD);
  $("#dob").val(dbirth);
  $("#place-of-birth").val(pbirth);
  $("#civil-status").val(cstatus);
  $("#occupation").val(occu);
  $("#email").val(email);
  $("#contact-no").val(contact);
  $("#voter-status").val(vstatus);
  $("#identified").val(identified);
  $("#sector").val(sector);
  $("#citizenship").val(citizen);
  $("#household-no").val(hholdNo);
  $("#out-of-school-youth").prop("checked", osy);
  $("#person-with-disability").prop("checked", pwd);

  $("#mother-firstname").val(mfname);
  $("#mother-middlename").val(mmname);
  $("#mother-lastname").val(mlname);
  $("#mother-age").val(mage);
  $("#mother-house-no").val(mhouseNo);
  $("#mother-street").val(mstreet);
  $("#mother-subdivision").val(msubD);
  $("#mother-household-head").prop("checked", mhholdNo);

  $("#father-firstname").val(ffname);
  $("#father-middlename").val(fmname);
  $("#father-lastname").val(flname);
  $("#father-age").val(fage);
  $("#father-house-no").val(fhouseNo);
  $("#father-street").val(fstreet);
  $("#father-subdivision").val(fsubD);
  $("#father-household-head").prop("checked", fhholdNo);
}

function editBlotter(that) {
  id = $(that).attr("data-id");
  complainant = $(that).attr("data-complainant");
  respondent = $(that).attr("data-respondent");
  victim = $(that).attr("data-victim");
  type = $(that).attr("data-type");
  l = $(that).attr("data-location");
  date = $(that).attr("data-date");
  time = $(that).attr("data-time");
  details = $(that).attr("data-details");
  status = $(that).attr("data-status");

  $("#blotter_id").val(id);
  $("#complanantBlotter1").val(complainant);
  $("#respondenttBlotter1").val(respondent);
  $("#timeBlotter1").val(time);
  $("#typeBlotter1").val(type);
  $("#victimBlotter1").val(victim);
  $("#locationBlotter1").val(l);
  $("#dateBlotter1").val(date);
  $("#statusBlotter1").val(status);
  $("#detailsBlotter1").val(details);
}

function complainEdit(that) {
  id = $(that).attr("data-id");
  complainant = $(that).attr("data-complainant");
  date = $(that).attr("data-date");
  l = $(that).attr("data-location");
  time = $(that).attr("data-time");
  details = $(that).attr("data-details");
  status = $(that).attr("data-status");

  $("#complain_id").val(id);
  $("#fullnameComplain1").val(complainant);
  $("#dateComplain1").val(date);
  $("#locationComplain1").val(l);
  $("#timeComplain1").val(time);
  $("#detailComplain1").val(details);
  $("#statusComplain1").val(status);
}

function editAwareness(that) {
  id = $(that).attr("data-id");
  awareness = $(that).attr("data-name");
  date = $(that).attr("data-date");
  time = $(that).attr("data-time");
  l = $(that).attr("data-location");
  details = $(that).attr("data-details");
  status = $(that).attr("data-status");

  $("#awareness_id").val(id);
  $("#fullnameAwareness1").val(awareness);
  $("#dateAwareness1").val(date);
  $("#timeAwareness1").val(time);
  $("#locationAwareness1").val(l);
  $("#detailAwareness1").val(details);
  $("#statusAwareness1").val(status);
}

function editPassword(that) {
  id = $(that).attr("data-id");
  username = $(that).attr("data-username");

  $("#id").val(id);
  $("#username-user1").val(username);
}
