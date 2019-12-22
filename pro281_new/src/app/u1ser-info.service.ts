import { Injectable } from '@angular/core';
import { Http, Headers, Response } from "@angular/http";
import { Observable,of } from "rxjs";
import { catchError } from 'rxjs/operators';
import { map, filter, scan } from 'rxjs/operators';
import { U1serInfo } from './U1serInfo';


@Injectable({
  providedIn: 'root'
})
export class U1serInfoService {
  getDeleteTable(iddd: number) {
    throw new Error("Method not implemented.");
  }
  private statususer:boolean = false;
  private statusadmin:boolean = false;
  private baseurl:string = "https://project284.000webhostapp.com/";

  constructor(private http: Http) { 
  }
 
  public getU1serInfo():Observable<U1serInfo[]>{
    let url = this.baseurl + "/getbook.php";
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

 


  private parseData(res: Response): U1serInfo[] {
    let data = res.json();
    if (data.message != "Success") {
      console.log("error: " + data.Message);
      return [];
    } else {
      let arr:U1serInfo[] =[];
      for (let dbU1serInfo of data.data){
        let c:U1serInfo = new U1serInfo(dbU1serInfo.idbook,dbU1serInfo.foridsit ,dbU1serInfo.code,dbU1serInfo.card);
        //console.log(note.getText())
        arr.push(c);
      } 
      return arr;
    
    }
  }
  public getDeleteshow (id:number){
    // return this.courses;
    let url = this.baseurl + "delete/delete.php";
    let body = "&id="+id;
    let header = { headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }) };
    let callUrl: string = url + "?" + body;
    console.log("calling: " + callUrl);
    return this.http.post(url, body, header)
    .pipe(map((res: Response) => {
      let data =res.json();
     //return this.parseData(res);
     window.location.reload();
     alert("ลบสำเร็จ")
     }) )
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

  }


  



