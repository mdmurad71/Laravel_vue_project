
import AppStorage from './AppStorage';
import Token from './Token';

class User{

    responseAfterLogin(res){
        const access_token= res.data.access_token;
        const username= res.data.username;
        if(Token.isValid(access_token)){
            AppStorage.store(access_token, username);
        }
    }

   hasToken(){
    const storedToken= localStorage.getItem('token');
    if(storedToken){
        return Token.isValid(storedToken)? true: false;
    }
    return false;
   }

   loggedIn(){
    return this.hasToken();
   }

   logOut(){
    AppStorage.clear()
    return this.push('/')
   }

   name(){
    if(this.loggedIn){
        return this.localStorage.getItem('user');
    }
   }

   id(){
    if(this.loggedIn){
        const payload= Token.payload(localStorage.getItem('token'))
        return payload.sub;
    }

    return false;

   }


}

export default User = new User();