// console.log("All works");
//
// const serverURL = "auth";
function showAuthBlocks(){
    document.getElementById('signInLink').addEventListener("click", function (){
        document.getElementById('headerRegister').style.display = "none";
        document.getElementById('headerLogin').style.display = "block";
        document.getElementById('registerBlock').style.display = "none";
        document.getElementById('loginBlock').style.display = "block";
    });

    document.getElementById('registerInLink').addEventListener("click", function (){
        document.getElementById('headerRegister').style.display = "block";
        document.getElementById('headerLogin').style.display = "none";
        document.getElementById('loginBlock').style.display = "none";
        document.getElementById('registerBlock').style.display = "block";
    });
}
showAuthBlocks();
//
// let alertContainer = document.getElementById('liveAlertPlaceholder');
//
// const form = document.getElementById('registerForm');
// async function outputRegister(event, url){
//     try{
//         const currentForm = event.target;
//         event.preventDefault();
//         // let formData = new FormData(event.target);
//         let dataForm = new FormData(event.target)
//         const response = await fetch(url, {
//             method: 'POST',
//             // headers: {
//             //     'Content-Type': 'application/json'
//             // },
//             body: dataForm
//         });
//         let data = await response.json();
//
//
//         console.log(data);
//         if(data.status === "success"){
//             // alert("All success: " + data.msg);
//             currentForm.reset();
//         }
//         //else{
//         //     alert("data msg: " + data.msg);
//         // }
//         let dataMessage = "";
//         let typeAlert = "danger";
//         let textAlert = "Request error";
//         switch (data.msg) {
//             case "user has been added":
//                 // alert("User added successful");
//                 dataMessage = data.msg;
//                 typeAlert = "success";
//                 textAlert = "Notification"
//
//                 event.target.reset();
//                 break;
//             case "not success, empty fields":
//                 // alert("not success" + data.msg);
//                 dataMessage = data.msg;
//                 break;
//             case "not success, invalid login":
//                 // alert("not success" + data.msg);
//                 dataMessage = data.msg;
//                 break;
//             case "not success, invalid email":
//                 // alert("not success" + data.msg);
//                 dataMessage = data.msg;
//                 break;
//             case "not success, pass not match":
//                 // alert("not success, pwd not match" + data.msg);
//                 dataMessage = data.msg;
//                 break;
//             case "not success, user taken":
//                 // alert("not success" + data.msg);
//                 dataMessage = data.msg;
//                 break;
//             default:
//                 // alert("problem with reg the status:" + data.status + ", the msg: " + data.msg);
//                 dataMessage = data.msg;
//         }
//
//         //danger
//         //success
//         alertContainer.innerHTML = `
//             <div class="alert alert-${typeAlert} alert-dismissible fade show" role="alert">
//             ${textAlert}: ${dataMessage}
//             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//             </div>
//         `;
//         return data;
//     }catch (e) {
//         console.log(e.message)
//     }
// }
// form.addEventListener('submit', function (event){
//     outputRegister(event, serverURL);
// });
// // let data = await outputRegister(serverURL);
// // let output = document.querySelector('.output');
// // output.innerHTML = data.status;
//
//
//                                     // ANNOUNCEMENT PART: (add)
// // document.getElementById('attempBtn').addEventListener("click", function (){
// //
// // })