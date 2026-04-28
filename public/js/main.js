// console.log("All works");
async function testFetchAPI(){
        try{
        const response = await fetch("/auth?mess=test", {
           method: "GET",
           headers: {
             "Content-Type": "application/json"
           },
           // body: JSON.stringify({mess: "test fetch api, the values"})
        });
        if(response.ok){
            const jsonResponse = await response.json()
            console.log("Success:", JSON.stringify(jsonResponse));
        }else{
            console.log("Not successful, the status: ", response.status);
        }
    }
    catch (e) {
        console.log("error: ", e);
        // TODO: add some block to show errors
    }
}

testFetchAPI();