import User from './User'

class Exception {

    handle(error){
        return this.isExpired(error.response.data.error);
    }

    isExpired (error) {
        
        if(error == 'Token is expired' || error == 'Token is invalid') {
            return User.logout()
        }
    }
}

export default Exception = new Exception();