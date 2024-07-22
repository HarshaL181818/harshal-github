import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/painting.dart';

class CalculatorView extends StatefulWidget {
  const CalculatorView({super.key});
  @override
  State<CalculatorView> createState() => _CalculatorViewState();
}

class _CalculatorViewState extends State<CalculatorView> {
  int x=0;
  int y=0;
  num z=0;
  final displayOneController = TextEditingController();
  final displayTwoController = TextEditingController();
  late final AppLifecycleListener _listener;
  @override
  void initState(){
    super.initState();
    displayOneController.text = x.toString();
    displayTwoController.text = y.toString();
    _listener = AppLifecycleListener(
      onShow: _onShow,
      onHide: _onHide,
      onResume: _onResume,
      onDetach: _onDetach,
      onInactive: _onInactive,
      onPause: _onPause,
      onRestart: _onRestart,
      onStateChange: _onStateChange,
    );
  }
  void _onShow() => print("onShow called");
  void _onHide() => print("onHide called");
  void _onResume() => print("onResume called");
  void _onDetach() => print("onDetach called");
  void _onInactive() => print("onInactive called");
  void _onPause() => print("onPause called");
  void _onRestart() => print("onRestart called");
  void _onStateChange(AppLifecycleState state) {
    print("onStateChange called with state: $state");
  }
  @override
  void dispose() {
    displayTwoController.dispose();
    displayOneController.dispose();
    _listener.dispose();
    super.dispose();
  }
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.all(32.0),
      child: Column(
        children: [
          //display
          CalculatorDisplay(
              key: const Key("displayOne"),
              hint: "Enter first number",
              controller: displayOneController),
          const SizedBox(
            height: 30,
          ),
          CalculatorDisplay(
              key: const Key("displayTwo"),
              hint: "Enter second number",
              controller: displayTwoController),
          //expand
          const SizedBox(
            height: 30,
          ),
          Text(
            key: Key("result"),
            z.toString(),
            style: const TextStyle(
            fontSize: 40,
            fontWeight: FontWeight.bold,
          ),),
          const Spacer(),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              FloatingActionButton(
                  onPressed: () {
                    setState(() {
                      z= (num.tryParse(displayOneController.text))! + (num.tryParse(displayTwoController.text))!;
                    });
                  },
                child: const Icon(CupertinoIcons.add),
              ),
              FloatingActionButton(
                onPressed: () {
                  setState(() {
                    z=(num.tryParse(displayOneController.text))! - (num.tryParse(displayTwoController.text))!;
                  });
                },
                child: const Icon(CupertinoIcons.minus ),
              ),
              FloatingActionButton(
                onPressed: () {
                  setState(() {
                    z=(num.tryParse(displayOneController.text))! * (num.tryParse(displayTwoController.text))!;
                  });
                },
                child: const Icon(CupertinoIcons.multiply ),
              ),
              FloatingActionButton(
                onPressed: () {
                  setState(() {
                    z=(num.tryParse(displayOneController.text))! / (num.tryParse(displayTwoController.text))!;
                  });
                },
                child: const Icon(CupertinoIcons.divide),
              )
            ]
          ),
          const SizedBox(
            height: 20,
          ),
          FloatingActionButton.extended(
            onPressed: () {
              setState(() {
                x=0;
                y=0;
                z=0;
                displayOneController.clear();
                displayTwoController.clear();
              });
            },
            label: const Text("Clear"),
          )
          //buttons
        ]
      ),
    );
  }
}

class CalculatorDisplay extends StatelessWidget {
  const CalculatorDisplay({
    super.key,
    this.hint = "Enter a number",
    required this.controller,
  });
  final String? hint;
  final TextEditingController controller;
  @override
  Widget build(BuildContext context) {
    return TextField(
      controller: controller,
      keyboardType: TextInputType.number,
      decoration: InputDecoration(

        border: OutlineInputBorder(
          borderSide: const BorderSide(
            color: Colors.black,
            width: 3.0,
          ),
          borderRadius: BorderRadius.circular(10),
        ),

        focusedBorder: OutlineInputBorder(
          borderSide: const BorderSide(
            color: Colors.black,
            width: 3.0,
          ),
          borderRadius: BorderRadius.circular(10),
        ),

        hintText: hint,
        hintStyle: const TextStyle(
          color: Colors.black,
        ),
      ),
    );
  }
}
