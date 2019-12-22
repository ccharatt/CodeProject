import { Injectable } from '@angular/core';
import { Http, Headers, Response } from "@angular/http";
import { Observable,of } from "rxjs";
import { catchError } from 'rxjs/operators';
import { map, filter, scan } from 'rxjs/operators';
import { Router } from "@angular/router";
import { sha256 } from 'js-sha256';
@Injectable({
  providedIn: 'root'
})
export class CourseService {
  private baseurl:string = "https://projectcs284.000webhostapp.com/";

  constructor(private http: Http,private router: Router) { }
  public Checkuser(users: String,pass:String){
    // return this.courses;
      let url = this.baseurl + "users.php";
      let body = "";
      let header = { headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }) };
      let callUrl: string = url + "?" + body;
      console.log("calling: " + callUrl);
      return this.http.post(url, body, header)
      .pipe(map((res: Response) => {
        if(this.parseData(res,users,pass)){
          this.router.navigate(["/home"]);
        }else{
          //console.log(SHA256("123456"));
         alert ("ไม่พบ Username หรือ Username Password ผิดพลาด");
        }
       // return this.parseData(res);
      })
    )
    .pipe(catchError((error: any) => {
      if (error.status == 404){
        console.log ("code note exist" );
        return of([]);
      }else{
        console.log("throw error" + JSON.stringify(error));
        return Observable.throw(error);
      }
    }))
  }

  private parseData(res: Response,users: String,pass:any):boolean {
    let data = res.json();
    if (data.message != "Success") {
      console.log("error: " + data.Message);
      return false;
    } else {

      let hashPass = sha256(pass);
      for (let dbCourse of data.data){
        if(users==dbCourse.username && hashPass==dbCourse.password){
          return true;
        }
      } 
      return false;
    }
  }
}
