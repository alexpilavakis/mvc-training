function add_users(id, new_name, new_email, new_password)
{
   var table=document.getElementById("users_table");
   var table_len=(table.rows.length)-1;
   var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'>" +
  "<td id='id_row"+table_len+"'>"+id+"</td>" +
  "<td id='name_row"+table_len+"'>"+new_name+"</td>" +
  "<td id='email_row"+table_len+"'>"+new_email+"</td>" +
  "<td id='password_row"+table_len+"'>"+new_password+"</td>" +"<td>" +
  "<button type='submit' name='edit" + id +"' class='btn btn-outline-primary btn-sm'> Edit</button>" +
  "<input type='hidden' name='name" + id +"' id='name' value='"+new_name+"'>" + "</td>" +"<td>" +
  "<button type='submit' name='delete" + id +"' class='delete btn btn-outline-danger btn-sm' >Delete</button></td></tr>";
}

function add_users1(id, new_name, new_email, new_password)
{
    var table=document.getElementById("users_table");
    var table_len=(table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'>" +
        "<td id='id_row"+table_len+"'>"+id+"</td>" +
        "<td id='name_row"+table_len+"'>"+new_name+"</td>" +
        "<td id='email_row"+table_len+"'>"+new_email+"</td>" +
        "<td id='password_row"+table_len+"'>"+new_password+"</td>" +"<td>" +
        "<form><button type='submit' name='edit" + id +"' class='btn btn-outline-primary btn-sm' formaction='/edit-user'>Edit</button>" +
        "" +
        "</form>" +
        "<input type='hidden' name='name" + id +"' id='name' value='"+new_name+"'>" + "</td>" +"<td>" +
        "<button type='submit' name='delete" + id +"' class='delete btn btn-outline-danger btn-sm' >Delete</button></td></tr>";
}


function add_tasks(id, new_description, new_completed, new_assigned)
{
    var completed, assigned;
    if (new_completed === "1"){
        new_completed = "Completed";
        completed = "success";
    }else {
        new_completed = "Work in Progress";
        completed = "info";
    }
    if (new_assigned === ""){
        new_assigned = "Un-assigned";
        assigned = "secondary";
    }else {
        new_assigned = "Assigned";
        assigned = "warning";
    }

    var table=document.getElementById("tasks_table");
    var table_len=(table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'>" +
        "<td id='id_row"+table_len+"'>"+id+"</td>" +
        "<td id='description_row"+table_len+"'>"+new_description+"</td>" +
        "<td id='completed_row"+table_len+"'><span class='badge badge-" + completed +"'> " + new_completed + "</span></td> " +
        "<td id='assigned_row"+table_len+"'><span class='badge badge-" + assigned +"'> " + new_assigned + "</span></td><td>" +
        "<button type='submit' name='edit" + id +"' class='btn btn-outline-primary btn-sm'> Edit</button>" +
        "<input type='hidden' name='description" + id +"' id='name' value='"+new_description+"'>" + "</td>" +"<td>" +
        "<button type='submit' name='delete" + id +"' class='delete btn btn-outline-danger btn-sm' >Delete</button></td></tr>";

}

function DoPost($form) {

    document.getElementById($form).submit()
}