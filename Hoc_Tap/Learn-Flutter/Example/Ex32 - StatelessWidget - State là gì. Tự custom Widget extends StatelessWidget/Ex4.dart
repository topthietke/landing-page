import 'dart:ffi';

import 'package:flutter/material.dart';

class Ex4 {
  void run() {
    runApp(
      MaterialApp(
        home: SafeArea(
          child: Scaffold(
            // appBar: AppBar(
            //   backgroundColor: Colors.red,
            //   title: const Text('Tu hoc Flutter'),
            // ), // AppBar
            // body: const Center(child: Text('Hello World')), // Center
            body: Center(child:  myWidget2(false))
            ,
          ), // Scaffold
        ), // SafeArea
        debugShowCheckedModeBanner: false,
      ),
    ); // MaterialApp
  }
}

class myWidget extends StatelessWidget {

  final bool loading;
  myWidget(this.loading);

  @override
  Widget build(BuildContext context) {
    // if (loading) {
    //   return const CircularProgressIndicator();
    // } else {
    //   return const Text('State');
    // }
    // TODO: implement build

    return loading ? const CircularProgressIndicator() :const Text('aaaaaaaaaaaaa');

    throw UnimplementedError();
  }

}

class myWidget2 extends StatefulWidget {
  @override
  final bool testing;

  myWidget2(this.testing);

  @override
  State<StatefulWidget> createState() {
    // TODO: implement createState
    return MyWidget2State();
  }


}
class MyWidget2State extends State<myWidget2> {
  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return widget.testing ? const CircularProgressIndicator() :const Text('aaaaaaaaaa');
  }

}