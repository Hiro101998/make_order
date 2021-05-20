<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div v-if="collectFlg">
                                <div class="card-header">2020年第1弾</div>
                                <button @click="doGatya">開封</button> 
                                 <div class="card-body">
                                         開封回数{{count}}
                                        <button class="btn btn-success btn-lg" @click="decide">オーダー作成画面へ</button> <br>
                                        <div v-for="name in this.playerName" :key="name.id" class="mt-3">{{name}}</div>  
                                </div>
                        </div> 
                    </div>
             </div>
                        <div v-if="!collectFlg">
                            <div>オーダー作成</div>
                                <div  style="position: relative;">
                                     <img src="storage/baseball_field.png" alt="グラウンド" style="min-width:988px;max-width:1200px; height:600px;">
                                     <!-- 先発 -->
                                    <div class="card" style="width: 5rem; position: absolute;　top:60%; left:5%;">
                                        <div style="background-color:rgb(255, 255, 128);">先発</div>
                                        <draggable group="pitchers">
                                        <div v-for="startingPitcher in sp" :key="startingPitcher.id" class="list-group list-group-flush">{{startingPitcher}}</div>
                                        </draggable>
                                    </div>

                                    <!-- 中継ぎ -->
                                    <div class="card" style="width: 5rem; position: absolute;　top:75%; left:5%;">
                                        <div style="background-color:rgb(255, 255, 128);">中継ぎ</div>
                                        <draggable group="pitchers">
                                        <div v-for="middleReliefPitcher in mlp" :key="middleReliefPitcher.id" class="list-group list-group-flush">{{middleReliefPitcher}}</div>
                                        </draggable>
                                    </div>

                                    <!-- 抑え -->
                                      <div class="card" style="width: 5rem; position: absolute;　top:90%; left:5%;">
                                            <div style="background-color:rgb(255, 255, 128);">抑え</div>
                                            <draggable group="pitchers" @end="onEnd">
                                            <div v-for="closer in clo" :key="closer.id" class="list-group list-group-flush">{{closer}}</div>
                                            </draggable>
                                      </div>

                                    <!--キャッチャー  -->
                                      <div class="card" style="width: 5rem; position: absolute;　top:90%; left:42%;">
                                            <div style="background-color:rgb(255, 255, 128);">捕手</div>
                                            <draggable group="fielders">
                                            <div v-for="catcher in position2" :key="catcher.id" class="list-group list-group-flush">{{catcher}}</div>
                                            </draggable>
                                     </div>

                                    <!-- ファースト -->
                                     <div class="card" style="width: 5rem; position: absolute;　top:63%; left:61%;">
                                            <div style="background-color:rgb(255, 255, 128);">一塁手</div>
                                            <draggable group="fielders">
                                            <div v-for="fb in position3" :key="fb.id" class="list-group list-group-flush">{{fb}}</div>
                                            </draggable>
                                     </div>

                                        <!-- セカンド -->
                                       <div class="card" style="width: 5rem; position: absolute;　top:50%; left:52%;">
                                            <div style="background-color:rgb(255, 255, 128);">二塁手</div>
                                            <draggable group="fielders">
                                            <div v-for="sb in position4" :key="sb.id" class="list-group list-group-flush">{{sb}}</div>
                                            </draggable>
                                     </div>

                                        <!-- サード -->
                                       <div class="card" style="width: 5rem; position: absolute;　top:63%; left:25%;">
                                            <div style="background-color:rgb(255, 255, 128);">三塁手</div>
                                            <draggable group="fielders">
                                            <div v-for="tb in position5" :key="tb.id" class="list-group list-group-flush">{{tb}}</div>
                                            </draggable>
                                     　</div>

                                         <!-- ショート -->
                                       <div class="card" style="width: 5rem; position: absolute;　top:50%; left:32%;">
                                            <div style="background-color:rgb(255, 255, 128);">遊撃手</div>
                                            <draggable group="fielders">
                                            <div v-for="ss in position6" :key="ss.id" class="list-group list-group-flush">{{ss}}</div>
                                            </draggable>
                                     　</div>

                                         <!--レフト  -->
                                        <div class="card" style="width: 5rem; position: absolute;　top:30%; left:20%;">
                                            <div style="background-color:rgb(255, 255, 128);">左翼手</div>
                                            <draggable group="fielders">
                                            <div v-for="lf in position7" :key="lf.id" class="list-group list-group-flush">{{lf}}</div>
                                            </draggable>
                                     　</div>

                                            <!--センター  -->
                                        <div class="card" style="width: 5rem; position: absolute;　top:20%; left:41%;">
                                            <div style="background-color:rgb(255, 255, 128);">中堅手</div>
                                            <draggable group="fielders">
                                            <div v-for="cf in position8" :key="cf.id" class="list-group list-group-flush">{{cf}}</div>
                                            </draggable>
                                     　</div>

                                         <!--ライト  -->
                                        <div class="card" style="width: 5rem; position: absolute;　top:30.5%; left:65%;">
                                            <div style="background-color:rgb(255, 255, 128);">右翼手</div>
                                            <draggable group="fielders">
                                            <div v-for="rf in position9" :key="rf.id" class="list-group list-group-flush">{{rf}}</div>
                                            </draggable>
                                     　</div>
                                     

                                </div>
                                    
                        
                            

                            <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card" style="width: 15rem;">
                                        <div class="card-header">投手</div>
                                        <draggable group="pitchers" @end="onEnd">
                                            <div v-for="pitcherResult in pitcher" :key="pitcherResult.id" class="list-group list-group-flush">{{pitcherResult.name}}</div>
                                        </draggable>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="card" style="width: 15rem;">
                                        <div class="card-header">捕手</div>  
                                          <draggable :options="{group:'fielders'}">
                                        <div v-for="catcherResult in catcher" :key="catcherResult.id">{{catcherResult.name}}</div>
                                             </draggable>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="card" style="width: 15rem;">
                                            <div class="card-header">内野手</div>
                                         <draggable :options="{group:'fielders'}">
                                            <div v-for="infielderResult in infielder" :key="infielderResult.id">{{infielderResult.name}}</div>
                                        </draggable>
                                    </div>
                                </div>
                                
                                 <div class="col-sm">
                                    <div class="card" style="width: 15rem;">
                                        <div class="card-header">外野手</div>
                                        <draggable :options="{group:'fielders'}" >
                                        <div v-for="outfielderResult in outfielder" :key="outfielderResult.id" class="list-group list-group-flush" >
                                          {{outfielderResult.name}} 
                                        </div>
                                         </draggable>
                                    </div>  
                                </div>
                      
                            </div>
                            </div>
                        </div>
               
      </div>
 </div>
</template>

<script>
import draggable from 'vuedraggable';
import Storage from 'vue-ls';
     export default {
        components: { draggable },
        data:function(){
        return{
        count:0,
        playerName:[],
        member:[],
        fielders:[],
        pitcher:[],
        catcher:[],
        infielder:[],
        outfielder:[],
        sp:[],
        mlp:[],
        clo:[],
        position2:[],
        position3:[],
        position4:[],
        position5:[],
        position6:[],
        position7:[],
        position8:[],
        position9:[],
        collectFlg:true,
        }},
        methods:{
             doGatya:function(){
                this.count = this.count+1;
                let random = players[Math.floor(Math.random() * players.length)];  
                let i = players.indexOf(random);
                let gatyaResult = players[i];
                this.playerName.push(gatyaResult.name);
                this.member.push(gatyaResult);
                },
              decide:function(){
                 this.collectFlg =false;
                 const member = this.member;
                for(let i in member){
                     if(member[i].position_id ==1){
                        this.pitcher.push(member[i])
                    }
                    else if(member[i].position_id ==2){
                         this.catcher.push(member[i])
                     }else if(member[i].position_id ==3){
                         this.infielder.push(member[i])
                     }else{
                         this.outfielder.push(member[i])
                     }
                }
              },
        
              


              
        }
    }
   
    
</script>
