import { Injectable } from '@angular/core';
import { Http, Headers, Response } from "@angular/http";
import { Observable,of } from "rxjs";
import { catchError } from 'rxjs/operators';
import { map, filter, scan } from 'rxjs/operators';
import { UserInfo } from './UserInfo';


@Injectable({
  providedIn: 'root'
})
export class UserInfoService {
  private statususer:boolean = false;
  private statusadmin:boolean = false;
  private baseurl:string = "https://project284.000webhostapp.com/";

  constructor(private http: Http) { 
  }
  public getUserInfo():Observable<UserInfo[]>{
    let url = this.baseurl + "/sit.php";
    let body = "";
    let header = { headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }) };
    let callUrl: string = url + "?" + body;
    console.log("calling: " + callUrl);
    return this.http.post(url, body, header)
    .pipe(map((res: Response) => {
      return this.parseData(res);
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

 


  private parseData(res: Response): UserInfo[] {
    let data = res.json();
    if (data.message != "Success") {
      console.log("error: " + data.Message);
      return [];
    } else {
      let arr:UserInfo[] =[];
      for (let dbUserInfo of data.data){
        let c:UserInfo = new UserInfo(dbUserInfo.idsit,dbUserInfo.foridmovie ,dbUserInfo.status);
        //console.log(note.getText())
        arr.push(c);
      } 
      return arr;
    
    }
  }
    
  public addUserInfo( username:string, password:string,life:number){
    let url = this.baseurl+"/add.php";
    let body = "&username="+username+"&password="+password+"&life="+life;
    let header = { headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }) };
    let callUrl: string = url + "?" + body;
    console.log("add UserInfo calling: " + callUrl);
    return this.http.post(url, body, header)
    .pipe(map((res: Response) => {
      let data = res.json();
      if (data.message == "Success"){
      console.log("add success");
      return true;
      }else{
      console.log("add fail");
      return false;
      }
    }))
    .pipe(catchError((error: any) => {
      console.log("throw error" + JSON.stringify(error));
      return Observable.throw(error); 
    })) 
  }
  
  public getLogin(username:String,password:String):Observable<boolean>{
    let url = this.baseurl + "/list.php";
    let body = "username="+username+"&password="+password;
    let header = { headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }) };
    let callUrl: string = url + "?" + body;
    return this.http.post(url, body, header)
    .pipe(map((res: Response) => {
      return this.parseDatalogin(res);
    })
    
    )
    .pipe(catchError((error: any) => {
      if (error.status == 404){
        console.log ("code note exist" );
        return of(false);
      }else{
        console.log("throw error" + JSON.stringify(error));
        return Observable.throw(error);
      }
    }))
  }

  private parseDatalogin(res: Response): boolean {
    let data = res.json();
    if (data.message != "Success") {
      console.log("error: " + data.Message);
      return false;
    } else {
      if(data.data.result=="pass"){
        return true;
      }else{
        return false;
      }
      
    }
  }



  public addBooking(idbook:number,foridsit:number,code:string,card:string)
  {
    let url = this.baseurl+"/addbook.php";
    let body = "&idbook="+idbook+"&foridsit="+foridsit+"&code="+code+"&code="+card;
    let header = { headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }) };
    let callUrl: string = url + "?" + body;
    console.log("add UserInfo calling: " + callUrl);
    return this.http.post(url, body, header)
    .pipe(map((res: Response) => {
      let data = res.json();
      if (data.message == "Success"){
      console.log("add success");
      return true;
      }else{
      console.log("add fail");
      return false;
      }
    }))
    .pipe(catchError((error: any) => {
      console.log("throw error" + JSON.stringify(error));
      return Observable.throw(error); 
    })) 
  }

  public updatesit(idsit:number,foridmovie:number,status:number)
  {
    let url = this.baseurl+"/updatesit.php";
    let body = "&idsit="+idsit+"&foridmovie="+foridmovie+"&status="+status;
    let header = { headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }) };
    let callUrl: string = url + "?" + body;
    console.log("add UserInfo calling: " + callUrl);
    return this.http.post(url, body, header)
    .pipe(map((res: Response) => {
      let data = res.json();
      if (data.message == "Success"){
      console.log("add success");
      return true;
      }else{
      console.log("add fail");
      return false;
      }
    }))
    .pipe(catchError((error: any) => {
      console.log("throw error" + JSON.stringify(error));
      return Observable.throw(error); 
    })) 
  }


  }


  



