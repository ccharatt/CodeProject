export class UserInfo{
    private idsit:number;
    private foridmovie:number;
    private status:number;
    constructor(idsit:number,foridmovie:number,status:number){
      this.idsit = idsit;
      this.foridmovie = foridmovie;
      this.status = status;
    }
    
    public getidsit():number{
      return this.idsit;
    }
  
    public getforidmovie():number{
      return this.foridmovie;
    }
  
    public getstatus():number{
      return this.status;
    }

    
  
  }