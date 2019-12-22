import { Component, OnInit } from '@angular/core';
import { Route, Router } from '@angular/router';
import { U1serInfoService } from '../u1ser-info.service';
import { U1serInfo } from '../U1serInfo';

@Component({
  selector: 'app-checkcode',
  templateUrl: './checkcode.component.html',
  styleUrls: ['./checkcode.component.css']
})
export class CheckcodeComponent implements OnInit {
  private list:U1serInfo[];
  private i:number
  private input:string;
  constructor(private ourService:U1serInfoService, private router:Router) { 
    ourService.getU1serInfo().subscribe(temp=> {
      if(temp != undefined) {
        this.list = temp;
      } else {
        this.list = [];
      }
    })
  }

  ngOnInit() {
  }
  deletecourse(iddd:number){
    // console.log("id = " + id);
    this.ourService.getDeleteTable(iddd);
   }
 
  public test(idd:number){
    for(this.i=0;this.i<this.list.length;this.i++){
      if(this.list[this.i].getcode() == this.input){
        // this.ourService.getDeleteTable(idd);
        alert("Yes")
        return;
      }
    }
    alert("NO")
  }

}
