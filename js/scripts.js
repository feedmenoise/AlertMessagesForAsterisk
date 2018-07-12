function SecListBox(ListBox, text, value, id) {
    try {
        var option = document.createElement("OPTION");
        option.value = value;
        option.text = text;
        option.id = id;
        ListBox.options.add(option)
    } catch (er) {
        alert(er)
    }
}

function FirstListBox() {
    try {
        var count = document.getElementById("lstBox").options.length;
        for (i = 0; i < count; i++) {
            if (document.getElementById("lstBox").options[i].selected) {
                SecListBox(document.getElementById("ListBox1"), document.getElementById("lstBox").options[i].value,
                    document.getElementById("lstBox").options[i].value, document.getElementById("lstBox").options[i].id );
                document.getElementById("lstBox").remove(i);
                break
            }
        }
    } catch (er) {
        alert(er)
    }
}

function SortAllItems() {
    var arr = new Array();
    var arr1 = new Array();
    for (i = 0; i < document.getElementById("lstBox").options.length; i++) {
        arr[i] = document.getElementById("lstBox").options[i].value
        arr1[i] = document.getElementById("lstBox").options[i].id
    }
    arr.sort();
    arr1.sort();
    RemoveAll();
    for (i = 0; i < arr.length; i++) {
        SecListBox(document.getElementById("lstBox"), arr[i], arr[i], arr1[i])
    }
}

function RemoveAll() {
    try {
        document.getElementById("lstBox").options.length = 0
    } catch (er) {
        alert(er)
    }
}

function SecondListBox() {
    try {
        var count = document.getElementById("ListBox1").options.length;
        for (i = 0; i < count; i++) {
            if (document.getElementById("ListBox1").options[i].selected) {
                SecListBox(document.getElementById("lstBox"), document.getElementById("ListBox1").options[i].value,
                    document.getElementById("ListBox1").options[i].value, document.getElementById("ListBox1").options[i].id);
                document.getElementById("ListBox1").remove(i);
                break
            }
        }

    } catch (er) {
        alert(er)
    }
}

function send_value(){
    var messages = new Array();
    for (i = 0; i < document.getElementById("ListBox1").options.length; i++) {
        messages[i] = document.getElementById("ListBox1").options[i].id;
    }

    document.myform.secret.value = messages.toString();

}
