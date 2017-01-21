import { Role } from "./role.model";
export class User {
    id?:         string;
    fullname:    string;
    username:    string;
    password:    string;
    address:     string;
    phone:       string;
    birthday:    string;
    email:       string;
    note:        string;
    active:      boolean;
    position_id: number;
    created_by:  number;
    updated_by:  number;
    created_at?: string;
    updated_at?: string;
    role:        Role[];

    /**
     *
     */
    constructor() {
        this.fullname = "";
        this.username = "";
        this.password = "";
        this.address = "";
        this.phone = "";
        this.birthday = "";
        this.email = "";
        this.note = "";
        this.active = false;
        this.position_id = 0;
        this.created_by = 0;
        this.updated_by = 0;
    }
}