import { Component, OnInit } from '@angular/core';
import { CourseService } from '../course.service';
import { Router } from "@angular/router";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  private username:string="";
  private password:string="";
  constructor(private courseService:CourseService,private router: Router) { }
  private checkUser():void{
    this.courseService.Checkuser(this.username,this.password).subscribe();
  }
  ngOnInit() {
  }

  
}
