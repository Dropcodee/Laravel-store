export default class AuthScript {
    constructor(user) {
        this.user = user;
    }

    // authentication of users

    isAdmin() {
        return this.user.type === "admin";
    }
    isManager() {
        return this.user.type === "author";
    }
    isUser() {
        return this.user.type === "user";
    }
    isAdminOrAuthor() {
        if (this.user.type === "admin" || this.user.type === "author")
            return true;
    }
}
